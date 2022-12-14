<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPriceList extends Model
{
    //
    protected $table = 'project_price_lists';

    protected $guarded = [];

    public function project() {
      return $this->belongsTo(Projects::class, 'project_id');
    }

    public function articleList() {
      return $this->belongsTo(ArticleList::class, 'article_list_id', 'id');
    }

    public function supplier() {
      return $this->belongsTo(Shippingcompany::class, 'supplier_id', 'id');
    }
}
