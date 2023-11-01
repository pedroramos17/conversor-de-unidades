<?php

require_once 'UnitType.php';

interface ConversorInterface {
    public function convert(float $value, string $from, string $to): void;
    public function convertToMeters(string $from): float;
    public function convertFromMeters(string $to): float;
}

class Conversor implements ConversorInterface {
    private float $value;
    private string $from;
    private string $to;

    public function getValue(): float {
        return $this->value;
    }

    public function getFrom(): string {
        return $this->from;
    }

    public function getTo(): string {
        return $this->to;
    }

    private function setValue(float $value): void {
        $this->value = $value;
    }

    private function setFrom(string $from): void {
        $this->from = $from;
    }

    private function setTo(string $to): void {
        $this->to = $to;
    }

    public function convert(float $value, string $from, string $to): void {
        $this->setValue($value);
        $this->setFrom($from);
        $this->setTo($to);
    }
    public function convertToMeters(string $from): float {
        switch($from) {
            case Unit::METERS->value:
                return $this->value;
            case Unit::KILOMETERS->value:
                return $this->value * 1000;
            case Unit::CENTIMETERS->value:
                return $this->value / 100;
            case Unit::MILIMETERS->value:
                return $this->value / 1000;
            default: return 0;
        }

    }
    public function convertFromMeters(string $to): float {
        switch($to) {
            case Unit::METERS->value:
                return $this->value;
            case Unit::KILOMETERS->value:
                return $this->value / 1000;
            case Unit::CENTIMETERS->value:
                return $this->value * 100;
            case Unit::MILIMETERS->value:
                return $this->value * 1000;
            default: return 0;
        }
    }
}