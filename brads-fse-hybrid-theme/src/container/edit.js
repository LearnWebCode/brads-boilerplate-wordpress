import { InnerBlocks, useBlockProps } from "@wordpress/block-editor"

export default function Edit(props) {
  const blockProps = useBlockProps()

  return (
    <div {...blockProps}>
      <div className="our-admin-container">
        <InnerBlocks />
      </div>
    </div>
  )
}
