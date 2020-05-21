<?php
//参考:https://techracho.bpsinc.jp/hachi8833/2017_10_11/46069#composite

interface Employee
{
    public function __construct(string $name, float $salary);
    public function getName(): string;
    public function setSalary(float $salary); 
    public function getSalary(): float;
    public function getRoles(): string;
}

class Developer implements Employee
{
    protected $salary;
    protected $name;
    protected $roles;

    public function __construct(string $name, float $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->roles = __CLASS__;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getRoles(): string
    {
        return $this->roles;
    }

}

class Designer implements Employee
{
    protected $salary;
    protected $name;
    protected $roles;

    public function __construct(string $name, float $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->roles = __CLASS__;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getRoles(): string
    {
        return $this->roles;
    }

}

class Organization
{
    protected $employees;

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function getNetSalaries(): float
    {
        $netSalary = 0;

        foreach ($this->employees as $employee){
            $netSalary += $employee->getSalary();
        }

        return $netSalary;
    }
}

$john = new Developer("John Doe", 12000);
$jane = new Designer("Jane Doe", 15000);

$organization = new Organization();
$organization->addEmployee($john);
$organization->addEmployee($jane);

echo "正味の給料:".$organization->getNetSalaries();

?>