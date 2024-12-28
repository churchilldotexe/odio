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
    collect($this->galleries)->each(function (array $gallery, string $position) {

        foreach ($gallery as $device => $path) {
            $this->product->galleryImages()->create([
                'image_position' => $position,
                'device_type' => $device,
                'image_path' => $path,
            ]);
        }
    });

    expect(GalleryImage::count())->toEqual(9);
});

it('should create product with gallery images using helper method createByType', function () {

    foreach ($this->galleries as $position => $galleryImages) {

        $this->galleryModel->createByPosition($this->product->id, $position, $galleryImages);
    }

    expect(GalleryImage::count())->toEqual(9);
});

it('should throw an exception because of unique constraints', function () {

    foreach ($this->galleries as $position => $galleryImages) {

        $this->galleryModel->createByPosition($this->product->id, $position, $galleryImages);
    }

    $this->expectException(QueryException::class);

    // repeating the process to trigger the unique constraints
    foreach ($this->galleries as $position => $galleryImages) {
        $this->galleryModel->createByPosition($this->product->id, $position, $galleryImages);
    }
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

    foreach ($invalidGallery as $position => $galleryImages) {
        $this->galleryModel->createByPosition($this->product->id, $position, $galleryImages);
    }
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

    foreach ($invalidGallery as $position => $galleryImages) {
        $this->galleryModel->createByPosition($this->product->id, $position, $galleryImages);
    }
});
