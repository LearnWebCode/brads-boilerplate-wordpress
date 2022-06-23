wp.blocks.registerBlockType("makeupnamespace/make-up-block-name", {
  title: "Brads Boilerplate Block",
  icon: "welcome-learn-more",
  category: "common",
  attributes: {
    skyColor: { type: "string" },
    grassColor: { type: "string" }
  },
  edit: EditComponent,
  save: function () {
    return null
  }
})

function EditComponent(props) {
  function updateSkyColor(e) {
    props.setAttributes({ skyColor: e.target.value })
  }

  function updateGrassColor(e) {
    props.setAttributes({ grassColor: e.target.value })
  }

  return (
    <div className="my-unique-plugin-wrapper-class">
      <div className="bg-blue-200 border border-blue-300 rounded-md p-5">
        <input className="mr-3 p-2" type="text" value={props.attributes.skyColor} onChange={updateSkyColor} placeholder="sky color..." />
        <input className="p-2" type="text" value={props.attributes.grassColor} onChange={updateGrassColor} placeholder="grass color..." />
      </div>
    </div>
  )
}
