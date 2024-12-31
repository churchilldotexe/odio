interface TimeStamp {
    created_at: string;
    updated_at: string;
}
// Base interface for common image properties
export interface ImageBase {
    mobile: string;
    desktop: string;
    tablet: string;
}

// Interface for product inclusions
export interface ProductInclusion extends TimeStamp {
    id: number;
    product_id: number;
    item_name: string;
    quantity: number;
}

// Interfaces for grouped images
export interface ProductImages {
    category: ImageBase;
    main: ImageBase;
}

export interface GalleryImages {
    first: ImageBase;
    second: ImageBase;
    third: ImageBase;
}

// Main Product interface
export interface BaseProduct extends TimeStamp {
    id: number;
    name: string;
    category: string;
    new: boolean;
    price: number;
    description: string;
    features: string;
}
