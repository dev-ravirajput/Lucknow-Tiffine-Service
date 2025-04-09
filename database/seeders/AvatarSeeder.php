<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AvatarSeeder extends Seeder
{
    public function run()
    {
        // Create directory if it doesn't exist
        Storage::makeDirectory('public/avatars');

        // Sample avatar names
        $avatarNames = [
            'Chef Master', 'Kitchen Pro', 'Cooking Star',
            'Food Artist', 'Recipe Wizard', 'Gourmet Expert',
            'Spice Specialist', 'Baking Champion', 'Grill Master'
        ];

        // Create 10 avatars
        for ($i = 0; $i < 10; $i++) {
            $avatarName = $avatarNames[array_rand($avatarNames)] . ' ' . ($i + 1);
            $imageName = 'avatar-' . Str::random(10) . '.jpg';
            
            // Generate and store fake image
            $imagePath = 'public/avatars/' . $imageName;
            $this->generateFakeImage(storage_path('app/' . $imagePath));
            
            Avatar::create([
                'name' => $avatarName,
                'avatar' => 'avatars/' . $imageName // Store relative path
            ]);
        }
    }

    protected function generateFakeImage($path)
    {
        // Create a blank image
        $image = imagecreatetruecolor(200, 200);
        
        // Fill background
        $bgColor = imagecolorallocate($image, 
            rand(100, 255), 
            rand(100, 255), 
            rand(100, 255)
        );
        imagefill($image, 0, 0, $bgColor);
        
        // Add random shapes
        for ($i = 0; $i < 5; $i++) {
            $color = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));
            if (rand(0, 1)) {
                imageellipse($image, rand(0, 200), rand(0, 200), rand(50, 100), rand(50, 100), $color);
            } else {
                imagerectangle($image, rand(0, 150), rand(0, 150), rand(50, 200), rand(50, 200), $color);
            }
        }
        
        // Save image
        imagejpeg($image, $path);
        imagedestroy($image);
    }
}