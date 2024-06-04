import React, { useState } from "react"
import ReactDOM from "react-dom/client"

const divsToUpdate = document.querySelectorAll(".tailwind-update-me")

divsToUpdate.forEach(div => {
  const data = JSON.parse(div.querySelector("pre").innerText)
  const root = ReactDOM.createRoot(div)
  root.render(<OurComponent {...data} />)
  div.classList.remove("tailwind-update-me")
})

function OurComponent(props) {
  const [showSkyColor, setShowSkyColor] = useState(false)
  const [showGrassColor, setShowGrassColor] = useState(false)

  return (
    <div className="my-unique-plugin-wrapper-class">
      <div className="bg-amber-100 border-2 border-amber-300 p-4 my-3 rounded shadow-md">
        <p>
          <button
            className="rounded bg-gray-100 hover:bg-gray-200 active:bg-gray-300 border border-gray-300 py-1 px-3 mr-3 mb-3 inline-block"
            onClick={() => setShowSkyColor(prev => !prev)}
          >
            Toggle view sky color
          </button>
          {showSkyColor && <span>{props.skyColor}</span>}
        </p>
        <p>
          <button
            className="rounded bg-gray-100 hover:bg-gray-200 active:bg-gray-300 border border-gray-300 py-1 px-3 mr-3 mb-3 inline-block"
            onClick={() => setShowGrassColor(prev => !prev)}
          >
            Toggle view grass color
          </button>
          {showGrassColor && <span>{props.grassColor}</span>}
        </p>
      </div>
    </div>
  )
}
