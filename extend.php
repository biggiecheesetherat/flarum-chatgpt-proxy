<?php

/*
 * This file is part of muhammedsaidckr/flarum-chatgpt.
 * This code was modified to make the extension more suited for a proxy.
 *
 * Copyright (c) 2023 Muhammed Said Cakir.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Msc\ChatGPT;

use Flarum\Discussion\Event\Started;
use Flarum\Extend;
use Msc\ChatGPT\Listener\ReplyToPost;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/less/admin.less'),
    (new Extend\Locales(__DIR__.'/locale')),

    (new Extend\ServiceProvider())
        ->register(BindingsProvider::class)
        ->register(ClientProvider::class),

    (new Extend\Event())
        ->listen(Started::class, ReplyToPost::class),

    (new Extend\Settings())
        ->default('muhammedsaidckr-chatgpt.enable_on_discussion_started', true)
        ->default('muhammedsaidckr-chatgpt.max_tokens', 100)
        ->default('muhammedsaidckr-chatgpt.user_prompt_badge_text', 'Assistant')
        ->serializeToForum('chatGptUserPromptId', 'muhammedsaidckr-chatgpt.user_prompt')
        ->serializeToForum('chatGptBadgeText', 'muhammedsaidckr-chatgpt.user_prompt_badge_text'),
];
