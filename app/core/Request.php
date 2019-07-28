<?php


namespace Core;


class Request
{
    public static function getUri() {
        return $_SERVER[ 'PATH_INFO' ];
    }

    public static function hasHeader( string $name ): bool {
        return !empty( getallheaders()[ $name ] );
    }

    public static function getHeaderValue( string $name ): ?string {
        return getallheaders()[ $name ] ?? null;
    }

    public static function getBody() {
        $body_str = file_get_contents('php://input');
        return $body_str ? json_decode( $body_str, true ): [];
    }

    public static function getFields() {
        return array_merge( $_GET, $_POST );
    }
}
