import "./index.scss"

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
    <div className="makeUpYourBlockTypeName">
      <input
        type="text"
        value={props.attributes.skyColor}
        onChange={updateSkyColor}
        placeholder="sky color..."
      />
      <input
        type="text"
        value={props.attributes.grassColor}
        onChange={updateGrassColor}
        placeholder="grass color..."
      />
    </div>
  )
}
