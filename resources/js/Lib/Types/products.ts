interface TimeStamp {
  created_at: string;
  updated_at: string;
}
// Base interface for common image properties
interface ImageBase extends TimeStamp {
  id: number;
  product_id: number;
  device_type: 'mobile' | 'desktop' | 'tablet';
  image_path: string;
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
  category: Array<ImageBase & { image_type: 'category' }>;
  main: Array<ImageBase & { image_type: 'main' }>;
}

export interface GalleryImages {
  first: Array<ImageBase & { image_position: 'first' }>;
  second: Array<ImageBase & { image_position: 'second' }>;
  third: Array<ImageBase & { image_position: 'third' }>;
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
