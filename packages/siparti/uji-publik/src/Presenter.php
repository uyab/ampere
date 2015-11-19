<?php

namespace Siparti\UjiPublik;

use Prettus\Repository\Presenter\FractalPresenter;

class Presenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new Transformer();
    }
}