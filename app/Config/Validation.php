<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];
    
    public $departamento = [        
        'dpto' => 'required|min_length[1]|max_length[255]' 
    ];

    public $responsables = [        
        'nombre' => 'required|min_length[1]|max_length[255]',
        'lastname' => 'required|min_length[1]|max_length[255]',
        'cargo' => 'required|min_length[1]|max_length[255]' 
    ];

    public $cpu = [        
        'nombrepc' => 'required|min_length[1]|max_length[25]',
        'inventario' => 'required|min_length[1]|max_length[25]',
        'marca' => 'required|min_length[1]|max_length[25]',
        'so' => 'required|min_length[1]|max_length[25]' 
    ];

    public $placa = [        
        'socket' => 'required|min_length[1]|max_length[11]',
        'numserie' => 'required|min_length[1]|max_length[15]',
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]'        
    ];

    public $micro = [        
        'velocidad' => 'required|min_length[1]|max_length[11]',
        'cantnucleos' => 'required|min_length[1]|max_length[11]',
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]',
        'ns' => 'required|min_length[1]|max_length[25]'
    ];

    public $ram = [        
        'tipo' => 'required|min_length[1]|max_length[11]',
        'capacidad' => 'required|min_length[1]|max_length[11]',
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]',
        'ns' => 'required|min_length[1]|max_length[15]'
    ];
    
    public $fuente = [        
        'potencia' => 'required|min_length[1]|max_length[11]',        
        'marca' => 'required|min_length[1]|max_length[15]',
        'model' => 'required|min_length[1]|max_length[15]',
        'ns' => 'required|min_length[1]|max_length[25]'
    ];

    public $disco = [        
        'capacidad' => 'required|min_length[1]|max_length[11]',        
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]',
        'ns' => 'required|min_length[1]|max_length[15]'
    ];

    public $cd = [        
        'tipo' => 'required|min_length[1]|max_length[11]',        
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]',
        'ns' => 'required|min_length[1]|max_length[15]'
    ];

    public $teclado = [        
        'interfaz' => 'required|min_length[1]|max_length[11]',
        'inventario' => 'required|min_length[1]|max_length[15]',        
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]'
    ];

    public $mouse = [        
        'interfaz' => 'required|min_length[1]|max_length[25]',
        'inventario' => 'required|min_length[1]|max_length[25]',        
        'marca' => 'required|min_length[1]|max_length[25]',
        'modelo' => 'required|min_length[1]|max_length[25]',
        'ns' => 'required|min_length[1]|max_length[25]'
    ];

    public $bocina = [        
        'inventario' => 'required|min_length[1]|max_length[25]',        
        'marca' => 'required|min_length[1]|max_length[25]',
        'modelo' => 'required|min_length[1]|max_length[25]',
        'ns' => 'required|min_length[1]|max_length[25]'
    ];

    public $ups = [        
        'inventario' => 'required|min_length[1]|max_length[25]',        
        'marca' => 'required|min_length[1]|max_length[25]',
        'modelo' => 'required|min_length[1]|max_length[25]',
        'ns' => 'required|min_length[1]|max_length[25]'
    ];

    public $monitor = [        
        'inventario' => 'required|min_length[1]|max_length[15]',        
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]',
        'ns' => 'required|min_length[1]|max_length[15]'
    ];

    public $printer = [        
        'inventario' => 'required|min_length[1]|max_length[15]',        
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]',
        'ns' => 'required|min_length[1]|max_length[15]'
    ];

    public $modem = [        
        'inventario' => 'required|min_length[1]|max_length[15]',        
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]'
    ];

    public $router = [        
        'inventario' => 'required|min_length[1]|max_length[15]',        
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]'
    ];

    public $interruptor = [        
        'inventario' => 'required|min_length[1]|max_length[15]',        
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]',
        'ns' => 'required|min_length[1]|max_length[25]'
    ];

    public $telefono = [        
        'marca' => 'required|min_length[1]|max_length[15]',
        'modelo' => 'required|min_length[1]|max_length[15]',
        'inventario' => 'required|min_length[1]|max_length[15]',        
        'ns' => 'required|min_length[1]|max_length[25]'
    ];   
    
    public $software = [        
        'name_soft' => 'required|min_length[1]|max_length[15]',
        'version' => 'required|min_length[1]|max_length[15]',
        'fabricante' => 'required|min_length[1]|max_length[15]'
    ];    

    public $virus = [        
        'descripcion' => 'required|min_length[1]|max_length[250]',
        'efectos_negativo' => 'required|min_length[1]|max_length[600]',
        'accion' => 'required|min_length[1]|max_length[600]'
    ];

    public $inspeccion = [        
        'accion' => 'required|min_length[1]|max_length[600]'
    ];

    public $incidencia = [        
        'acciones' => 'required|min_length[1]|max_length[600]'
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
