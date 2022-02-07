<?php
class Article
{
    public $title;
    public $titleFontSize;
    public $articleBody;
    public $articleBodyFontSize;
    public $border;
    public $bg;

    public function __construct(
        $title,
        $articleBody,
        $border,
        $bg = 'red',
        $titleFontSize = 20,
        $articleBodyFontSize = 14,
    ) {
        $this->title = $title;
        $this->titleFontSize = $titleFontSize;
        $this->articleBody = $articleBody;
        $this->articleBodyFontSize = $articleBodyFontSize;
        $this->border = $border;
        $this->bg = $bg;
    }

    public function printArticle()
    {
        echo "<div style='border: {$this->border}; background: {$this->bg}; font-size: {$this->articleBodyFontSize}px'>
                <h2 style='font-size: {$this->titleFontSize}px'>{$this->title}</h2>
                <span>{$this->articleBody}</span>
            </div>";
    }
}

class Product
{
    public $name;
    public $price;
    public $weight;
    public $nds = 20;

    public function __construct(
        $name,
        $price,
        $weight
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    public function checkNumber($x)
    {
        return gettype($x) == 'integer' ? $x : "Передана строка";
    }

    public function checkString($x)
    {
        return gettype($x) == 'string' ? $x : "Передано число";
    }

    public function ndsPrice()
    {
        if ($this->checkNumber($this->price) === "Передана строка") {
            return "Передана Строка, а не число";
        } else {
            return $this->price + ($this->price * ($this->nds / 100)) . "руб.";
        };
    }

    public function printInfoProduct()
    {
        echo "<div>
            <p>Название: {$this->checkString($this->name)}</p>
            <p>Цена до НДС: {$this->checkNumber($this->price)}</p>
            <p>НДС: {$this->ndsPrice()}</p>
            <p>Вес: {$this->checkNumber($this->weight)}</p>
        </div>";
    }
}

$test2 = new Article('Футбол сегодня', 'НАши выиграли чемпионат мира по футболу, ура!', '1px solid green', '', 21, 15);
$test2->printArticle();

$apple = new Product('Яблоко', '100', '1');
$apple->printInfoProduct();

$orange = new Product('Апельсин', 159, 2);
$orange->printInfoProduct();

$tomato = new Product('Помидор', 40, 5);
$tomato->printInfoProduct();
