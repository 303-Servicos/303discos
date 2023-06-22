<?php

use App\Models\Label;

use function Pest\Laravel\get;

test('only authenticated users can access the label info page', function () {
    $label = Label::factory()->create();

    get(route('labels.show', $label))->assertRedirect('login');
});
