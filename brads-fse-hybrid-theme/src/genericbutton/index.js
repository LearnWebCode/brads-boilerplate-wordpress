import { registerBlockType } from "@wordpress/blocks"
import metadata from "./block.json"
import Edit from "./edit"

function Save(props) {
  return (
    <a
      href={props.attributes.linkObject.url}
      className={`btn btn--${props.attributes.size} btn--${props.attributes.colorName}`}
    >
      {props.attributes.text}
    </a>
  )
}

registerBlockType(metadata.name, {
  edit: Edit,
  save: Save
})
