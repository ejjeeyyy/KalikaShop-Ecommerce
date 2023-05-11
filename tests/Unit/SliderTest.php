<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Slider;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SliderTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_create_a_slider()
    {
        // Given
        $data = [
            'title' => 'Sample Title',
            'description' => 'Sample Description',
            'image' => 'sample-image.jpg',
            'status' => 0,
        ];

        // When
        $slider = Slider::create($data);

        // Then
        $this->assertInstanceOf(Slider::class, $slider);
        $this->assertEquals($data['title'], $slider->title);
        $this->assertEquals($data['description'], $slider->description);
        $this->assertEquals($data['image'], $slider->image);
        $this->assertEquals($data['status'], $slider->status);
    }

      /** @test */
    public function it_can_update_a_slider()
    {
        // Given
        $sliderData = [
            'title' => 'Sample Title',
            'description' => 'Sample Description',
            'image' => 'sample-image.jpg',
            'status' => 0,
        ];

        $slider = Slider::create($sliderData);

        $updatedSliderData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'image' => 'updated-image.jpg',
            'status' => 0,
        ];

        // When
        $slider->update($updatedSliderData);

        // Then
        $updatedSlider = Slider::find($slider->id);

        $this->assertInstanceOf(Slider::class, $updatedSlider);
        $this->assertEquals($updatedSliderData['title'], $updatedSlider->title);
        $this->assertEquals($updatedSliderData['description'], $updatedSlider->description);
        $this->assertEquals($updatedSliderData['image'], $updatedSlider->image);
        $this->assertEquals($updatedSliderData['status'], $updatedSlider->status);
    }

    /** @test */
    public function it_can_delete_a_slider()
    {
        // Given
        $slider = Slider::create([
            'title' => 'Sample Title',
            'description' => 'Sample Description',
            'image' => 'sample-image.jpg',
            'status' => 0,
        ]);

        // When
        $slider->delete();

        // Then
        $this->assertNull(Slider::find($slider->id));
    }
}
