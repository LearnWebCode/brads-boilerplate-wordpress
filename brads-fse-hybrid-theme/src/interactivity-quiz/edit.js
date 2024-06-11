import {
  TextControl,
  Flex,
  FlexBlock,
  FlexItem,
  Button,
  Icon,
  PanelBody,
  PanelRow,
  ColorPicker
} from "@wordpress/components"
import { InspectorControls, BlockControls, AlignmentToolbar } from "@wordpress/block-editor"
import { ChromePicker } from "react-color"

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n"

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from "@wordpress/block-editor"

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @param {Object}   props               Properties passed to the function.
 * @param {Object}   props.attributes    Available block attributes.
 * @param {Function} props.setAttributes Function that updates individual attributes.
 *
 * @return {Element} Element to render.
 */
export default function Edit(props) {
  const blockProps = useBlockProps()

  function updateQuestion(value) {
    props.setAttributes({ question: value })
  }

  function deleteAnswer(indexToDelete) {
    const newAnswers = props.attributes.answers.filter(function (x, index) {
      return index != indexToDelete
    })
    props.setAttributes({ answers: newAnswers })

    if (indexToDelete == props.attributes.correctAnswer) {
      props.setAttributes({ correctAnswer: undefined })
    }
  }

  function markAsCorrect(index) {
    props.setAttributes({ correctAnswer: index })
  }

  return (
    <div {...blockProps}>
      <div
        className="paying-attention-edit-block"
        style={{ backgroundColor: props.attributes.bgColor }}
      >
        <BlockControls>
          <AlignmentToolbar
            value={props.attributes.theAlignment}
            onChange={x => props.setAttributes({ theAlignment: x })}
          />
        </BlockControls>
        <InspectorControls>
          <PanelBody title="Background Color" initialOpen={true}>
            <PanelRow>
              <ChromePicker
                color={props.attributes.bgColor}
                onChangeComplete={x => props.setAttributes({ bgColor: x.hex })}
                disableAlpha={true}
              />
            </PanelRow>
          </PanelBody>
        </InspectorControls>
        <TextControl
          label="Question:"
          value={props.attributes.question}
          onChange={updateQuestion}
          style={{ fontSize: "20px" }}
        />
        <p style={{ fontSize: "13px", margin: "20px 0 8px 0" }}>Answers:</p>
        {props.attributes.answers.map(function (answer, index) {
          return (
            <Flex>
              <FlexBlock>
                <TextControl
                  autoFocus={answer == undefined}
                  value={answer}
                  onChange={newValue => {
                    const newAnswers = props.attributes.answers.concat([])
                    newAnswers[index] = newValue
                    props.setAttributes({ answers: newAnswers })
                  }}
                />
              </FlexBlock>
              <FlexItem>
                <Button onClick={() => markAsCorrect(index)}>
                  <Icon
                    className="mark-as-correct"
                    icon={props.attributes.correctAnswer == index ? "star-filled" : "star-empty"}
                  />
                </Button>
              </FlexItem>
              <FlexItem>
                <Button isLink className="attention-delete" onClick={() => deleteAnswer(index)}>
                  Delete
                </Button>
              </FlexItem>
            </Flex>
          )
        })}
        <Button
          isPrimary
          onClick={() => {
            props.setAttributes({ answers: props.attributes.answers.concat([undefined]) })
          }}
        >
          Add another answer
        </Button>
      </div>
    </div>
  )
}
