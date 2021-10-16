<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->in(__DIR__ . '/examples')
    ->append([__FILE__])
;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules(
        [
            '@Symfony' => true,
            '@Symfony:risky' => true,
            'array_syntax' => ['syntax' => 'short'],
            'protected_to_private' => false,
            'combine_consecutive_unsets' => true,
            'linebreak_after_opening_tag' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'native_function_invocation' => [
                'include' => [
                    '@all',
                ],
            ],
            'ordered_class_elements' => true,
            'ordered_imports' => true,
            'strict_comparison' => false,
            'strict_param' => false,
            'concat_space' => [
                'spacing' => 'one',
            ],
            'php_unit_method_casing' => [
                'case' => 'snake_case',
            ],
        ],
    )
    ->setFinder($finder)
;
