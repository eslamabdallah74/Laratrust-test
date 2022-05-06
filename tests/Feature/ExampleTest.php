<?php

it('shows the homepage', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
