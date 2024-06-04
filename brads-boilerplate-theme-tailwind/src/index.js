import Person from "./scripts/Person"
import ExampleReactComponent from "./scripts/ExampleReactComponent"
import React from "react"
import ReactDOM from "react-dom/client"

const person1 = new Person("Brad")
if (document.querySelector("#render-react-example-here")) {
  const root = ReactDOM.createRoot(document.querySelector("#render-react-example-here"))
  root.render(<ExampleReactComponent />)
}
