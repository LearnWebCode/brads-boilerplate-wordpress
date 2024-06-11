<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

	wp_interactivity_state('create-block', array('solvedCount' => 0, 'skyColor' => 'blue'));

	$answers = array();
	for ($i = 0; $i < count($attributes['answers']); $i++) {
		$answers[$i]['index'] = $i;
		$answers[$i]['text'] = $attributes['answers'][$i];
		$answers[$i]['correct'] = $attributes['correctAnswer'] == $i;
	}
	$ourContext = array('answers' => $answers, 'solved' => false, 'showCongrats' => false, 'showSorry' => false, 'correctAnswer' => $attributes['correctAnswer']);

?>


<div style="background-color: <?php echo $attributes['bgColor'] ?>" class="paying-attention-frontend" data-wp-interactive="create-block" <?php echo wp_interactivity_data_wp_context($ourContext) ?>>
	<p><?php echo $attributes['question'] ?></p>
	<ul>
		<?php
			foreach($ourContext['answers'] as $answer) { ?>
				<li data-wp-class--no-click="callbacks.noclickclass" data-wp-class--fade-incorrect="callbacks.fadedclass" <?php echo wp_interactivity_data_wp_context($answer) ?> data-wp-on--click="actions.guessAttempt"><span data-wp-bind--hidden="!context.solved">
					<span data-wp-bind--hidden="!context.correct"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                </svg></span>
					<span data-wp-bind--hidden="context.correct"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg></span>
				</span> <?php echo $answer['text'] ?></li>
			<?php }
		?>
	</ul>

				<div class="correct-message" data-wp-class--correct-message--visible="context.showCongrats">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-emoji-smile" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
          <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
        </svg>
        <p>That is correct!</p>
      </div>

	<div class="incorrect-message" data-wp-class--incorrect-message--visible="context.showSorry">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-emoji-frown" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
          <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
        </svg>
        <p>Sorry, try again.</p>
      </div>
</div>
