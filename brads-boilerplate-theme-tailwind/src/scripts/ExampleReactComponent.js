import React, { useState } from "react"

function ExampleReactComponent() {
  const [clickCount, setClickCount] = useState(0)

  return (
    <div
      className="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-4 rounded-md"
      onClick={() => setClickCount(prev => prev + 1)}
    >
      <h1 className="text-xl">Hello from React!</h1>
      <p className="text-sm">
        You have clicked on this component{" "}
        <span className="text-yellow-200 font-bold">{clickCount}</span> times.
      </p>
    </div>
  )
}

export default ExampleReactComponent
