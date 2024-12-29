<?php

use App\Models\GalleryImage;
use App\Models\Product;
use Illuminate\Database\QueryException;

beforeEach(function () {
    $this->product = Product::factory()->create();

    $this->galleryModel = new GalleryImage;

    $this->galleries = [
        'first' => [
            'mobile' => './assets/product-yx1-earphones/mobile/image-gallery-1.jpg',
            'tablet' => './assets/product-yx1-earphones/tablet/image-gallery-1.jpg',
            'desktop' => './assets/product-yx1-earphones/desktop/image-gallery-1.jpg',
        ],
        'second' => [
            'mobile' => './assets/product-yx1-earphones/mobile/image-gallery-2.jpg',
            'tablet' => './assets/product-yx1-earphones/tablet/image-gallery-2.jpg',
            'desktop' => './assets/product-yx1-earphones/desktop/image-gallery-2.jpg',
        ],
        'third' => [
            'mobile' => './assets/product-yx1-earphones/mobile/image-gallery-3.jpg',
            'tablet' => './assets/product-yx1-earphones/tablet/image-gallery-3.jpg',
            'desktop' => './assets/product-yx1-earphones/desktop/image-gallery-3.jpg',
        ],
    ];

});

it('should create gallery through product relationship', function () {

    $result = collect($this->galleries)->flatmap(function (array $gallery, string $position) {
        return collect($gallery)->map(function (string $path, string $device) use ($position) {
            return [
                'image_position' => $position,
                'device_type' => $device,
                'image_path' => $path,
            ];
        })->values();
    })
        ->values()
        ->all();

    $this->product->galleryImages()->createMany($result);
    expect(GalleryImage::count())->toEqual(9);
});

it('should create product with gallery images using helper method createByType', function () {

    // foreach ($this->galleries as $position => $galleryImages) {
    //
    //     $this->galleryModel->createByPosition($this->product->id, $position, $galleryImages);
    // }

    $this->galleryModel->createByPosition($this->product->id, $this->galleries);
    expect(GalleryImage::count())->toEqual(9);
});

it('should throw an exception because of unique constraints', function () {

    $this->galleryModel->createByPosition($this->product->id, $this->galleries);

    $this->expectException(QueryException::class);

    $this->galleryModel->createByPosition($this->product->id, $this->galleries);
});

it('should throw an exception for the invalid enums of position column', function () {
    //plural firsts and fourth assoc array
    $invalidGallery = [
        'first' => [
            'mobile' => './assets/product-yx1-earphones/mobile/image-gallery-1.jpg',
            'tablet' => './assets/product-yx1-earphones/tablet/image-gallery-1.jpg',
            'desktop' => './assets/product-yx1-earphones/desktop/image-gallery-1.jpg',
        ],
        'second' => [
            'mobile' => './assets/product-yx1-earphones/mobile/image-gallery-2.jpg',
            'tablet' => './assets/product-yx1-earphones/tablet/image-gallery-2.jpg',
            'desktop' => './assets/product-yx1-earphones/desktop/image-gallery-2.jpg',
        ],
        'third' => [
            'mobile' => './assets/product-yx1-earphones/mobile/image-gallery-3.jpg',
            'tablet' => './assets/product-yx1-earphones/tablet/image-gallery-3.jpg',
            'desktop' => './assets/product-yx1-earphones/desktop/image-gallery-3.jpg',
        ],
        'fourth' => [
            'mobile' => './assets/product-yx1-earphones/mobile/image-gallery-3.jpg',
            'tablet' => './assets/product-yx1-earphones/tablet/image-gallery-3.jpg',
            'desktop' => './assets/product-yx1-earphones/desktop/image-gallery-3.jpg',
        ],
    ];

    $this->expectException(\ValueError::class);

    $this->galleryModel->createByPosition($this->product->id, $invalidGallery);
});

it('should throw an exception for the invalid enums of device type column', function () {
    //ultra-wide doesnt include in the enum
    $invalidGallery = [
        'first' => [
            'mobile' => './assets/product-yx1-earphones/mobile/image-gallery-1.jpg',
            'tablet' => './assets/product-yx1-earphones/tablet/image-gallery-1.jpg',
            'desktop' => './assets/product-yx1-earphones/desktop/image-gallery-1.jpg',
            'ultra-wide' => './assets/product-yx1-earphones/desktop/image-gallery-1.jpg',
        ],
    ];

    $this->expectException(\ValueError::class);

    $this->galleryModel->createByPosition($this->product->id, $invalidGallery);
    var_dump(GalleryImage::count());

});
