<?php

class Tool extends Elegant
{
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];
    protected $table = 'tools';

    /**
    * Category validation rules
    */
    public $rules = array(
        'name'   => 'required|alpha_space|min:3|max:255',
        'category_id'   	=> 'required|integer',
        'qty'   	=> 'required|integer|min:0',
    );

    public function category()
    {
        return $this->belongsTo('Category', 'category_id');
    }

    /**
    * Get action logs for this tool
    */
     public function assetlog()
    {
        return $this->hasMany('Actionlog','tool_id')->where('asset_type','=','tool')->orderBy('created_at', 'desc')->withTrashed();
    }


    public function users()
    {
        return $this->belongsToMany('User', 'tools_users', 'tool_id','assigned_to')->withPivot('id')->withTrashed();
    }

    public function hasUsers()
    {
        return $this->belongsToMany('User', 'tools_users', 'tool_id','assigned_to')->count();
    }

    public function checkin_email() {
        return $this->category->checkin_email;
    }

    public function requireAcceptance() {
	    return $this->category->require_acceptance;
    }

    public function getEula() {

	    $Parsedown = new Parsedown();

	    if ($this->category->eula_text) {
		    return $Parsedown->text(e($this->category->eula_text));
	    } elseif ((Setting::getSettings()->default_eula_text) && ($this->category->use_default_eula=='1')) {
		    return $Parsedown->text(e(Setting::getSettings()->default_eula_text));
	    } else {
		    return null;
	    }

    }

	/**
    * Get total tools
    */
     public static function toolcount()
    {
			DB::table('tools')
                    ->whereNull('deleted_at')
                    ->count();
    }

    /**
    * Get total tools available
    */
     public static function availtoolcount()
    {
        return DB::table('tools_users')
                    ->count();
    }



    public function numRemaining() {
	    $checkedout = $this->users->count();
	    $total = $this->qty;
	    $remaining = $total - $checkedout;
	    return $remaining;
    }


}
