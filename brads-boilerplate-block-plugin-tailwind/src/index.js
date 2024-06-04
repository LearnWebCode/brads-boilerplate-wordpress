import "./style.css"

import { useBlockProps } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"
import metadata from "./block.json"

registerBlockType(metadata.name, { edit: EditComponent })

function EditComponent(props) {
  function updateSkyColor(e) {
    props.setAttributes({ skyColor: e.target.value })
  }

  function updateGrassColor(e) {
    props.setAttributes({ grassColor: e.target.value })
  }

  return (
    <div {...useBlockProps()}>
      <div className="my-unique-plugin-wrapper-class">
        <div className="bg-blue-200 border-2 border-blue-300 rounded-md p-5">
          <input
            className="mr-3 p-2 rounded-lg"
            type="text"
            value={props.attributes.skyColor}
            onChange={updateSkyColor}
            placeholder="sky color..."
          />
          <input
            className="mr-3 p-2 rounded-lg"
            type="text"
            value={props.attributes.grassColor}
            onChange={updateGrassColor}
            placeholder="grass color..."
          />
        </div>
      </div>
    </div>
  )
}
