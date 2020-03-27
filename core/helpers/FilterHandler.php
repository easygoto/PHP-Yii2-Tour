<?php

namespace app\core\helpers;

use yii\db\ActiveQuery;

class FilterHandler
{
    private array $keywords = [];

    private array $range = [];

    private array $equals = [];

    private array $like = [];

    public function setKeywords(array $keywords): FilterHandler
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function setRange(array $range): FilterHandler
    {
        $this->range = $range;
        return $this;
    }

    public function setEquals(array $equals): FilterHandler
    {
        $this->equals = $equals;
        return $this;
    }

    public function setLike(array $like): FilterHandler
    {
        $this->like = $like;
        return $this;
    }

    public function addRange($column): FilterHandler
    {
        if (is_string($column)) {
            $this->range[] = $column;
        } elseif (is_array($column)) {
            $this->range = array_merge($this->range, $column);
        }
        return $this;
    }

    public function addEquals($column): FilterHandler
    {
        if (is_string($column)) {
            $this->equals[] = $column;
        } elseif (is_array($column)) {
            $this->equals = array_merge($this->range, $column);
        }
        return $this;
    }

    public function addLike($column): FilterHandler
    {
        if (is_string($column)) {
            $this->like[] = $column;
        } elseif (is_array($column)) {
            $this->like = array_merge($this->range, $column);
        }
        return $this;
    }

    public function buildQuery(ActiveQuery $query): ActiveQuery
    {
        $equalsAttr = [];
        $keywords = $this->keywords;
        foreach ($this->equals as $column) {
            $equalsAttr[$column] = $keywords[$column] ?? null;
        }
        $query->andFilterWhere($equalsAttr);
        foreach ($this->like as $column) {
            $query->andFilterWhere(['like', $column, $keywords[$column] ?? null]);
        }
        foreach ($this->range as $column) {
            if (isset($keywords[$column]['start'])) {
                $query->andFilterWhere(['>=', $column, $keywords[$column]['start'] ?? null]);
            }
            if (isset($keywords[$column]['end'])) {
                $query->andFilterWhere(['<', $column, $keywords[$column]['end'] ?? null]);
            }
        }
        return $query;
    }
}
