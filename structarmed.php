<?php

declare(strict_types=1);

use Boundwize\StructArmed\Architecture;
use Boundwize\StructArmed\Preset\Preset;
use Boundwize\StructArmed\Rule\Rules\Class_\MustBeFinalRule;

return Architecture::define()
    ->withPresets(Preset::PSR4(), Preset::CODEQUALITY())
    ->layer('Exception', 'src/LaminasDiagnosticsFactories/Exception')
    ->layer('Factory', 'src/LaminasDiagnosticsFactories', 'src/LaminasDiagnosticsFactories/Exception')
    ->ruleset([
        'Exception' => [],
        'Factory'   => ['+Exception'],
    ])
    ->layer('tests', 'test')
    ->rule(
        'tests_must_be_final',
        new MustBeFinalRule(layer: 'tests')
    );
