const marked = require("marked")

const markdownPreviewContainer = document.getElementById("markdown-with-preview")

if (markdownPreviewContainer) {
  const input = markdownPreviewContainer.querySelector("[data-input]")
  const output = markdownPreviewContainer.querySelector("[data-output]")

  const render = () => {
    output.innerHTML = marked(input.value)
  }

  input.addEventListener("input", render)
  render()
}
