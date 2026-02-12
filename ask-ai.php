<?php

/**
 * Plugin Name: Ask AI
 * Description: Wrapper for the WordPress AI Client.
 * Version: 1.0.0
 * Plugin URI: https://mediumrare.dev/
 * Author: Medium Rare
 * Author URI: https://mediumrare.dev/
 * Text Domain: ask-ai
 */

if ( !defined( 'ABSPATH' ) )
    exit;

if ( !file_exists( __DIR__.'/vendor/autoload.php' ) )
    return;

require_once __DIR__.'/vendor/autoload.php';

add_action( 'init', [ 'WordPress\AI_Client\AI_Client', 'init' ] );

if ( !function_exists( 'ask_ai' ) )
{
    function ask_ai( $question )
    {
        try {
            $prompt = WordPress\AI_Client\AI_Client::prompt( $question );
        } catch ( \Exception $e ) {
            return [
                'success' => false,
                'data'    => 'Prompt could not be created.',
            ];
        }

        if ( !$prompt->is_supported_for_text_generation() ) {
            return [
                'success' => false,
                'data'    => 'AI is not ready for use.',
            ];
        }

        try {
            $result = $prompt->generate_text();
        } catch ( \Exception $e ) {
            return [
                'success' => false,
                'data'    => $e->getMessage(),
            ];
        }

        return [
            'success' => true,
            'data'    => $result,
        ];
    }
}

