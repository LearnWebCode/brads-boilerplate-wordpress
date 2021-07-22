import "./frontend.scss"
import React, { useState } from "react"
import ReactDOM from "react-dom"

const divsToUpdate = document.querySelectorAll(".boilerplate-update-me")

divsToUpdate.forEach(div => {
  const data = JSON.parse(div.querySelector("pre").innerText)
  ReactDOM.render(<OurComponent {...data} />, div)
  div.classList.remove("boilerplate-update-me")
})

function OurComponent(props) {
  const [showSkyColor, setShowSkyColor] = useState(false)
  const [showGrassColor, setShowGrassColor] = useState(false)

  return (
    <div className="boilerplate-frontend">
      <p>
        <button onClick={() => setShowSkyColor(prev => !prev)}>Toggle view sky color</button>
        {showSkyColor && <span>{props.skyColor}</span>}
      </p>
      <p>
        <button onClick={() => setShowGrassColor(prev => !prev)}>Toggle view grass color</button>
        {showGrassColor && <span>{props.grassColor}</span>}
      </p>
    </div>
  )
}
