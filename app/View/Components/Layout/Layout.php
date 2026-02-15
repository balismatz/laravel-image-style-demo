<?php

namespace App\View\Components\Layout;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * The navigation links.
     *
     * @var array<int, Collection<string, string|bool>>
     */
    public array $navigationLinks;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $title = null,
        public ?string $heading = null,
        public ?string $subheading = null,
    ) {
        $this->setNavigationLinks();
    }

    /**
     * Get if the given URL matches to the current URL.
     */
    public function isCurrentUrl(string $url): bool
    {
        return $url === url()->current();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.layout.layout');
    }

    /**
     * Set the navigation links.
     */
    protected function setNavigationLinks(): void
    {
        $homeUrl = route('home');

        $this->navigationLinks = [
            Collection::make([
                'url' => $homeUrl,
                'text' => 'Home',
                'current' => $this->isCurrentUrl($homeUrl),
            ]),
        ];

        foreach (Category::query()->select(['slug', 'title'])->limit(3)->get() as $category) {
            $categoryUrl = route('category.show', $category);

            $this->navigationLinks[] = Collection::make([
                'url' => $categoryUrl,
                'text' => $category->title,
                'current' => $this->isCurrentUrl($categoryUrl),
            ]);
        }
    }
}
