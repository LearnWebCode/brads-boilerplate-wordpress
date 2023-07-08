wp.blocks.registerBlockType("ourblocktheme/archive", {
  title: "Fictional University Archive",
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Archive Placeholder")
  },
  save: function () {
    return null
  }
})
