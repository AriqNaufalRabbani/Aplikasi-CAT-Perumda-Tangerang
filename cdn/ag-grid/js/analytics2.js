const trackingCache = {}

const EVENT_NAME = {
  rowGrouping: "Homepage Example Row Grouping",
  integratedCharts: "Homepage Example Integrated Charts",
  exampleRunner: "Example Runner",
  apiDocumentation: "API Documentation",
  demoToolbar: "Demo Toolbar",
  infoEmail: "Info Email",
  buyButton: "Buy Button",
  page404: "404"
}

const trackPlausible = ({ eventName, props }) => {
  const searchParams = new URLSearchParams(window?.location?.search)

  // Enable debug with either `?debug=true` query parameter or
  // `plausibleDebug` set to `true in localstorage
  const enableDebug =
    Boolean(searchParams.get("debug")) ||
    localStorage.getItem("plausibleDebug") === "true"

  if (enableDebug) {
    console.log("Plausible:", eventName, props)
  }

  if (globalThis.plausible) {
    globalThis.plausible(eventName, {
      props
    })
  }
}

/**
 * Track plausible event once using an object cache
 */
const createTrackPlausibleOnce = (key, trackingFn) => props => {
  const cacheKey = `${key}.${JSON.stringify(props)}`

  if (!trackingCache[cacheKey]) {
    trackingFn(props)
    trackingCache[cacheKey] = true
  }
}

const track404 = props => {
  trackPlausible({
    eventName: EVENT_NAME.page404,
    props
  })
}

const trackHomepageExample = ({ name, props }) => {
  trackPlausible({
    eventName: name,
    props
  })
}

const trackHomepageExampleRowGrouping = props => {
  trackHomepageExample({
    name: EVENT_NAME.rowGrouping,
    props
  })
}

const trackOnceHomepageExampleRowGrouping = createTrackPlausibleOnce(
  EVENT_NAME.rowGrouping,
  trackHomepageExampleRowGrouping
)

const trackHomepageExampleIntegratedCharts = props => {
  trackHomepageExample({
    name: EVENT_NAME.integratedCharts,
    props
  })
}

const trackOnceHomepageExampleIntegratedCharts = createTrackPlausibleOnce(
  EVENT_NAME.integratedCharts,
  trackHomepageExampleIntegratedCharts
)

const trackExampleRunner = props => {
  trackPlausible({
    eventName: EVENT_NAME.exampleRunner,
    props
  })
}

const trackOnceExampleRunner = createTrackPlausibleOnce(
  EVENT_NAME.exampleRunner,
  trackExampleRunner
)

const trackApiDocumentation = props => {
  trackPlausible({
    eventName: EVENT_NAME.apiDocumentation,
    props
  })
}

const trackDemoToolbar = props => {
  trackPlausible({
    eventName: EVENT_NAME.demoToolbar,
    props
  })
}

const trackOnceDemoToolbar = createTrackPlausibleOnce(
  EVENT_NAME.demoToolbar,
  trackDemoToolbar
)

const trackInfoEmail = props => {
  trackPlausible({
    eventName: EVENT_NAME.infoEmail,
    props
  })
}

const trackOnceInfoEmail = createTrackPlausibleOnce(
  EVENT_NAME.infoEmail,
  trackInfoEmail
)

const trackBuyButton = props => {
  trackPlausible({
    eventName: EVENT_NAME.buyButton,
    props
  })
}
