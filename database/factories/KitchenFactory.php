<?php

namespace Database\Factories;

use App\Models\Kitchen;
use Illuminate\Database\Eloquent\Factories\Factory;

class KitchenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kitchen::class;

    public function definition()
    {
        $types = ['veg', 'nonveg', 'both'];
        $statuses = ['active', 'pending', 'draft'];
        
        return [
            'owner_name' => $this->faker->name,
            'kitchen_name' => $this->faker->company . ' Kitchen',
            'email' => $this->faker->unique()->safeEmail,
            'contact_no' => (string) $this->faker->numerify('##########'),
            'sqft' => $this->faker->numberBetween(500, 2000),
            'status' => $this->faker->randomElement($statuses),
            'type' => $this->faker->randomElement($types),
            'rating' => $this->faker->numberBetween(1, 5),
            'location' => $this->faker->city,
            'coordinates' => $this->faker->latitude . ',' . $this->faker->longitude,
            'featured_img' => $this->faker->word . '-kitchen',
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
} 