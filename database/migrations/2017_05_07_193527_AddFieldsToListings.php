<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToListings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->integer('listing_category_id');
            $table->dateTime('postings_date');
            $table->dateTime('posting_expiration_date');
            $table->string('status');
            $table->integer('listing_type_id');
            $table->longText('body');
            $table->decimal('price', 5, 2);
            $table->integer('listing_area_id');
            $table->integer('listing_contact_id');
            $table->integer('listing_media_id')->nullable();
            $table->softDeletes();
        });
        Schema::create('listing_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listing_category_id');
        });
        Schema::create('listing_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
        });
        Schema::create('listing_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->integer('listing_type_id');
        });
        Schema::create('listing_area', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->integer('site_id');
            $table->longText('google_maps_iframe')->nullable();
        });
        Schema::create('listing_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_ext')->nullable();
            $table->boolean('can_text')->default(false);
            $table->boolean('can_call')->default(false);
            $table->boolean('can_email')->default(false);
            $table->string('CL_email_relay')->nullable();
            $table->boolean('permit_promotions')->default(false);
        });
        Schema::create('listing_media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('media_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listings');
        Schema::drop('listing_details');
        Schema::drop('listing_types');
        Schema::drop('listing_categories');
        Schema::drop('listing_area');
        Schema::drop('Listing_contacts');
        Schema::drop('listing_media');
    }
}
