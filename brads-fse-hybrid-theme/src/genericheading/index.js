import { RichText } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"
import metadata from "./block.json"
import Edit from "./edit"

function Save(props) {
  function createTagName() {
    switch (props.attributes.size) {
      case "large":
        return "h1"
      case "medium":
        return "h2"
      case "small":
        return "h3"
    }
  }

  return (
    <RichText.Content
      tagName={createTagName()}
      value={props.attributes.text}
      className={`headline headline--${props.attributes.size}`}
    />
  )
}

registerBlockType(metadata.name, {
  edit: Edit,
  save: Save
})
