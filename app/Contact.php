    public function getColorAttribute()
    {
        return Priority::getColor($this->priority);
    }

    public function getPriorityDescriptionAttribute()
    {
        return Priority::getDescription($this->priority);
    }
