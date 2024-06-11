/**
 * WordPress dependencies
 */
import { store, getContext } from "@wordpress/interactivity"

const { state } = store("create-block", {
  actions: {
    guessAttempt: () => {
      const context = getContext()
      if (!context.solved) {
        if (context.index === context.correctAnswer) {
          state.solvedCount++
          console.log(state)
          context.showCongrats = true
          setTimeout(() => {
            context.solved = true
          }, 1000)
        } else {
          context.showSorry = true
          setTimeout(() => {
            context.showSorry = false
          }, 2600)
        }
      }
    },
    toggle: () => {
      const context = getContext()
      context.isOpen = !context.isOpen
    }
  },
  callbacks: {
    noclickclass: () => {
      const context = getContext()
      return context.solved && context.correct
    },
    fadedclass: () => {
      const context = getContext()
      return context.solved && !context.correct
    },
    logIsOpen: () => {
      const { isOpen } = getContext()
      // Log the value of `isOpen` each time it changes.
      console.log(`Is open: ${isOpen}`)
    }
  }
})
