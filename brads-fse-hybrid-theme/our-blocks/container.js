import apiFetch from "@wordpress/api-fetch"
import { Button, PanelBody, PanelRow } from "@wordpress/components"
import { InnerBlocks, InspectorControls, MediaUpload, MediaUploadCheck } from "@wordpress/block-editor"
import { registerBlockType } from "@wordpress/blocks"
import { useEffect } from "@wordpress/element"

registerBlockType("ourblocktheme/container", {
  title: "Brad's Container",
  supports: {
    align: ["full"]
  },
  attributes: {
    align: { type: "string", default: "full" }
  },
  edit: EditComponent,
  save: SaveComponent
})

function EditComponent(props) {
  return (
    <>
      <div className="our-admin-container">
        <InnerBlocks />
      </div>
    </>
  )
}

function SaveComponent() {
  return <InnerBlocks.Content />
}
