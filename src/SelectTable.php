<?php

namespace AlexSabur\OrchidSelectTableField;

use Closure;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Laravel\SerializableClosure\SerializableClosure;
use Orchid\Screen\Field;

class SelectTable extends Field
{
    const MODE_SELECT = 'select';
    const MODE_INPUT = 'input';

    /**
     * @var string
     */
    protected $view = 'orchid-select-table-field::field';

    /**
     * Default attributes value.
     *
     * @var array
     */
    protected $attributes = [
        'value'     => [],

        'columns'   => null,
        'data'      => null,
        'id-column' => 'id',

        'title'     => '',
        'mode'      => 'select',
    ];

    /**
     * Attributes available for a particular tag.
     *
     * @var array
     */
    protected $inlineAttributes = [];

    public function __construct()
    {
        $this->addBeforeRender(function () {
            if ($this->get('mode') === static::MODE_SELECT) {
                $name = $this->get('name');

                $this->set('name', Str::finish($name, '[]'));
            }
        });
    }

    public function data(Closure $callback)
    {
        $serialize = serialize(new SerializableClosure($callback));
        $encryptSerialize = Crypt::encryptString($serialize);
        $this->set('data', $encryptSerialize);

        return $this;
    }
    
    public function columns(Closure $callback)
    {
        $serialize = serialize(new SerializableClosure($callback));
        $encryptSerialize = Crypt::encryptString($serialize);
        $this->set('columns', $encryptSerialize);
        
        return $this;
    }
}
