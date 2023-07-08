wp.blocks.registerBlockType("ourblocktheme/search", {
  title: "Fictional University Search",
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Search Placeholder")
  },
  save: function () {
    return null
  }
})
