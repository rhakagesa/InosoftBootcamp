<?php

class Transfer {   
    private int $id;
    private string $numberTransaction;
    private array $items;
    private string $vendorName;

    public function __construct(int $id = 0, array $items = [], string $vendorName = "") {
        $this->id = $id;
        $this->items = $items;
        $this->vendorName = $vendorName;
    }

    public function id(): int {
        return $this->id;
    }

    public function transferNumber(): string {
        return $this->numberTransaction;
    }

    public function items(): array {
        return $this->items;
    }

    public function vendorName(): string {
        return $this->vendorName;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setVendorName(string $vendorName){
        $this->vendorName = $vendorName;
    }

    public function getItem(string $numberTransaction){
        if(isset($this->items) === NULL){
            return "Belum ada transaksi";
        }
        else{
            $foundData = false;
            foreach ($this->items as $keyItem => $item) {
                if($keyItem === $numberTransaction){
                    echo "Pencarian ditemukan.\nNomor Transaksi : ".$keyItem."\n";
                    print_r($item);
                    $foundData = true;
                }
            }

            if(!$foundData){
                echo "Data dengan nomor transaksi '".$numberTransaction."' tidak ditemukan";
            }
        }
    }

    public function transferItem(string $numberTransaction, array $items){
        $this->numberTransaction = $numberTransaction;
        if(isset($this->items)){
            $this->items[$this->numberTransaction] = $items;
        }
        else {
            $this->items = array($this->numberTransaction => $items);
        }
    }

    public function getDetails(){
        echo "Nomor Id: ".$this->id."\nNama Vendor: ".$this->vendorName."\nTransaksi Barang: \n";
        foreach($this->items as $key => $items){
            echo "\t".$key.": \n";
            foreach ($items as $keyItem => $item) {
                echo "\t\t\t\t".$keyItem.": " .$item."\n";
            }
        }
    }
}

class User {
    public function getVendorName(Transfer $vendor){
        echo "Nama Vendor: ". $vendor->vendorName();
    }
}     

echo "---------------Vendor Section------------------\n";
$vendorA = new Transfer();
$vendorA->setId(1);
$vendorA->setVendorName("PT. Berkah Sejahtera");
$vendorA->transferItem("abcedfgij1234567", [
                            "Barang A" => 5,
                            "Barang B" => 5,
                            "Barang C" => 10,
                        ]);
$vendorA->transferItem("65432fhgdfsdffds", [
                            "Barang D" => 1,
                            "Barang E" => 3,
                            "Barang F" => 4,
                        ]);
$vendorA->getDetails();

echo "\n";

$vendorB = new Transfer(2, ["a1b2c3d4e5f6g7h8i9j10" =>[
    "Barang A" => 9,
    "Barang B" => 3,
    "Barang C" => 2,
]], "PT. Halal Makmur");
$vendorB->transferItem("mnbbvvccxdsfsdgh876765", [
                            "Barang D" => 2,
                            "Barang E" => 6,
                            "Barang F" => 4,
                        ]);
$vendorB->getDetails();
$vendorB->getItem("a1b2c3d4e5f6g7h8i9j10");
$vendorB->getItem("6asdasdasdd");


echo "\n\n\n--------------User Section------------------\n";

$user1 = new User;
$user1->getVendorName($vendorA);
echo "\n";
$user1->getVendorName($vendorB);

