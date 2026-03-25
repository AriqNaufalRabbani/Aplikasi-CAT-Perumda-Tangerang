<?php
defined('BASE_PATH') or exit('No direct script access allowed');



class MasterModul_model extends Controller
{
    private $db;
    private $UserID;

    public function __construct()
    {
        $this->db       =   new Database;
        $this->UserID   =   USERID;
    }

    public function getModulesbyUser()
    {
        $Query = "
            SELECT 
                m.id,
                m.module,
                m.descr,
                m.kategori,
                k.color,
                m.durasi,
                m.icon,
                m.aktif,
                m.crtdt,
                m.crtby,
                m.upddt,
                m.updby,
                COUNT(q.id) AS total_soal,
                CASE 
                    WHEN COUNT(ea.id) > 0 THEN '100'
                    ELSE '0'
                END AS status_ujian
            FROM modules m
            LEFT JOIN kategori k 
                ON k.name = m.kategori
            LEFT JOIN questions q 
                ON q.id_module = m.id
            LEFT JOIN exam_attempts ea 
                ON ea.module_id = m.id 
                AND ea.user_id = :user_id
            GROUP BY 
                m.id, m.module, m.descr, m.kategori, k.color,
                m.durasi, m.icon, m.aktif,
                m.crtdt, m.crtby, m.upddt, m.updby
            ORDER BY m.kategori;
        ";
        $this->db->prepare($Query);
        $this->db->execute([
            ':user_id'       => $this->UserID,
        ]);
        return $this->db->fetchAll();
    }

    public function getKategori()
    {
        $Query = "
            SELECT 
                id, 
                name, 
                color, 
                aktif, 
                crtdt, 
                crtby, 
                upddt, 
                updby
            FROM kategori;
        ";
        $this->db->prepare($Query);
        $this->db->execute();
        return $this->db->fetchAll();
    }

    public function getModules()
    {
        $Query = "
            SELECT 
                m.id,
                m.module,
                m.descr,
                m.kategori,
                k.color,
                m.durasi,
                m.icon,
                m.aktif,
                m.crtdt,
                m.crtby,
                m.upddt,
                m.updby
            FROM modules m
            LEFT JOIN kategori k
            ON k.name = m.kategori
            ORDER BY crtdt DESC
        ";
        $this->db->prepare($Query);
        $this->db->execute();
        return $this->db->fetchAll();
    }

    public function getQuestions()
    {
        $Query = "
            SELECT 
                id, 
                id_module, 
                question, 
                seqno, 
                image, 
                key_answer, 
                aktif, 
                crtdt, 
                crtby, 
                upddt, 
                updby
            FROM questions;
        ";
        $this->db->prepare($Query);
        $this->db->execute();
        return $this->db->fetchAll();
    }

    public function getAnswers()
    {
        $Query = "
            SELECT 
                id, 
                id_question, 
                answer, 
                seqno, 
                image, 
                aktif, 
                crtdt, 
                crtby, 
                upddt, 
                updby
            FROM answers;
        ";
        $this->db->prepare($Query);
        $this->db->execute();
        return $this->db->fetchAll();
    }

    public function loadModules()
    {
        try {
            $Modules    = $this->getModules();
            $Questions  = $this->getQuestions();
            $Answers    = $this->getAnswers();

            $Result = array(
                'modules'    => $Modules,
                'questions'     => $Questions,
                'answers'    => $Answers,
            );

            return $Result;
        } catch (Exception $e) {
            http_response_code(500);
            return [
                "message" => "Error",
                "error" => $e->getMessage()
            ];
        }
    }

    public function saveModules()
    {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            $id = $data['id'];

            if ($id) {
                // UPDATE
                $sql = "
                    UPDATE modules 
                    SET module = :module,
                        descr = :descr,
                        kategori = :kategori,
                        durasi = :durasi,
                        icon = :icon,
                        aktif = :aktif,
                        upddt = NOW(),
                        updby = 'admin'
                    WHERE id = :id
                ";
                $this->db->prepare($sql);
                $this->db->execute([
                    ':id'       => $id,
                    ':module'   => $data['module'],
                    ':descr'    => $data['descr'],
                    ':kategori' => $data['kategori'],
                    ':durasi'   => $data['durasi'],
                    ':icon'     => $data['icon'],
                    ':aktif'    => $data['aktif'],
                ]);

                $Result = array(
                    'status'    => 'success',
                    'id'        => $id
                );

                return $Result;
            } else {
                // INSERT
                $sql = "
                    INSERT INTO modules (
                        id, module, descr, kategori, durasi, icon, aktif, crtdt, crtby
                    ) VALUES (
                        gen_random_uuid(), :module, :descr, :kategori, :durasi, :icon, :aktif, NOW(), 'admin'
                    )
                    RETURNING id
                ";
                $this->db->prepare($sql);
                $this->db->execute([
                    ':module'   => $data['module'],
                    ':descr'    => $data['descr'],
                    ':kategori' => $data['kategori'],
                    ':durasi'   => $data['durasi'],
                    ':icon'     => $data['icon'],
                    ':aktif'    => $data['aktif'],
                ]);

                $result = $this->db->fetch(PDO::FETCH_ASSOC);

                $Result = array(
                    'status'    => 'success',
                    'id'        => $result['id']
                );

                return $Result;
            }
        } catch (Exception $e) {
            http_response_code(500);
            return [
                "message" => "Error",
                "error" => $e->getMessage()
            ];
        }
    }

    public function saveQuestions()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        // echo '<pre>';
        // echo print_r($data);
        // echo '</pre>';
        // exit;

        $moduleId = $data['id_module'];

        $this->db->beginTransaction();

        try {
            // ❌ hapus lama
            $this->db->prepare("DELETE FROM answers WHERE id_question IN (
                SELECT id FROM questions WHERE id_module = :mid
            )");
            $this->db->execute([':mid' => $moduleId]);

            $this->db->prepare("DELETE FROM questions WHERE id_module = :mid");
            $this->db->execute([':mid' => $moduleId]);

            // ✅ insert baru
            foreach ($data['questions'] as $q) {

                $this->db->prepare("
                    INSERT INTO questions 
                    (id, id_module, question, seqno, key_answer, aktif, crtdt, crtby)
                    VALUES 
                    (:id, :mid, :question, :seqno, :key, 'Y', NOW(), 'admin')
                ");

                $this->db->execute([
                    ':id' => $q['id'],
                    ':mid' => $moduleId,
                    ':question' => $q['question'],
                    ':seqno' => $q['seqno'],
                    ':key' => $q['key_answer']
                ]);

                foreach ($q['answers'] as $a) {
                    $this->db->prepare("
                        INSERT INTO answers 
                        (id, id_question, answer, seqno, aktif, crtdt, crtby)
                        VALUES 
                        (:id, :qid, :answer, :seqno, 'Y', NOW(), 'admin')
                    ");

                    $this->db->execute([
                        ':id' => $a['id'],
                        ':qid' => $q['id'],
                        ':answer' => $a['answer'],
                        ':seqno' => $a['seqno']
                    ]);
                }
            }

            $this->db->commit();

            return ['status' => 'success'];
        } catch (Exception $e) {
            $this->db->rollBack();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function deleteModule()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'];

        $this->db->beginTransaction();

        try {
            // ambil question id
            $this->db->prepare("SELECT id FROM questions WHERE id_module = :id");
            $this->db->execute([':id' => $id]);
            $qids = $this->db->fetchAll(PDO::FETCH_COLUMN);

            if ($qids) {
                // hapus answers
                $in = implode(",", array_fill(0, count($qids), "?"));
                $this->db->prepare("DELETE FROM answers WHERE id_question IN ($in)");
                $this->db->execute($qids);
            }

            // hapus questions
            $this->db->prepare("DELETE FROM questions WHERE id_module = :id");
            $this->db->execute([':id' => $id]);

            // hapus module
            $this->db->prepare("DELETE FROM modules WHERE id = :id");
            $this->db->execute([':id' => $id]);

            $this->db->commit();

            return ['status' => 'success'];
        } catch (Exception $e) {
            $this->db->rollBack();
            return ['status' => 'error'];
        }
    }
}
