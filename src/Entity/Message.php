<?php
	
	namespace App\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	use Symfony\Component\Validator\Constraints as Assert;
	use Gedmo\Mapping\Annotation as Gedmo;
	use App\Validator\Constraints as MyAssert;
	
	/**
	 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
	 */
	class Message
	{
		/**
		 * @ORM\Id()
		 * @ORM\GeneratedValue()
		 * @ORM\Column(type="integer")
		 */
		private $id;
		
		/**
		 * @ORM\Column(type="string", length=255)
		 * @Assert\NotBlank(message="Please enter an message name.")
         */
		private $name;
		
		/**
		 * @ORM\Column(type="string", length=255)
		 * @Assert\Email(
		 *     message = "The email '{{ value }}' is not a valid email.",
		 *     checkMX = true
		 * )
		 */
		private $email;
		
		/**
		 * @ORM\Column(type="string", length=255)
		 * @Assert\Regex(
		 *     pattern = "/^((\+|00)32\s?|0)(\d\s?\d{3}|\d{2}\s?\d{2})(\s?\d{2}){2}$/"
		 * )
		 */
		private $tel;
		
		/**
		 * @ORM\Column(type="string", length=255)
		 * @Assert\Regex(
		 *     pattern = "/^((\+|00)32\s?|0)4(60|[789]\d)(\s?\d{2}){3}$/"
		 * )
		 */
		private $gsm;
		
		/**
		 * @ORM\Column(type="string", length=255)
		 *
		 */
		private $objet;
		
		/**
		 * @Gedmo\Slug(fields={"objet"})
		 * @ORM\Column(length=128, unique=true)
		 */
		private $slug;
		
		/**
		 * @ORM\Column(type="text")
		 * @Assert\NotBlank
         * @MyAssert\ContainsInsult
		 */
		private $contenu;
        const CIVIL = ['Monsieur', 'Madame', 'Mademoiselle'];
        /**
         * @ORM\Column(type="string", length=255)
         * @Assert\Choice(choices=Message::CIVIL, message="Choose a valid civilitie.")
         */
        // OU : @Assert\Choice({'Monsieur', 'Madame', 'Mademoiselle'})
        private $sexe;
		
		/**
		 * @Assert\GreaterThan(
		 *     value = 18
		 * )
		 */
		protected $age;
		
		/**
		 * @ORM\Column(type="string", length=255)
		 *
		 */
		protected $path;
		
		/**
		 * @return mixed
		 */
		public function getPath()
		{
			return $this->path;
		}
		
		/**
		 * @param mixed $path
		 */
		public function setPath($path): void
		{
			$this->path = $path;
		}
		
		/**
		 * @return mixed
		 */
		public function getSlug()
		{
			return $this->slug;
		}
		
		/**
		 * @param mixed $slug
		 */
		public function setSlug($slug): void
		{
			$this->slug = $slug;
		}
		
		/**
		 * @return mixed
		 */
		public function getObjet()
		{
			return $this->objet;
		}
		
		/**
		 * @param mixed $objet
		 */
		public function setObjet($objet): void
		{
			$this->objet = $objet;
		}
		
		/**
		 * @return mixed
		 */
		public function getGsm()
		{
			return $this->gsm;
		}
		
		/**
		 * @param mixed $gsm
		 */
		public function setGsm($gsm): void
		{
			$this->gsm = $gsm;
		}
		
		
		public function getId(): ?int
		{
			return $this->id;
		}
		
		/**
		 * @return mixed
		 */
		public function getAge()
		{
			return $this->age;
		}
		
		/**
		 * @param mixed $age
		 */
		public function setAge($age): void
		{
			$this->age = $age;
		}
		
		public function getName(): ?string
		{
			return $this->name;
		}
		
		public function setName(string $name): self
		{
			$this->name = $name;
			
			return $this;
		}
		
		public function getEmail(): ?string
		{
			return $this->email;
		}
		
		public function setEmail(string $email): self
		{
			$this->email = $email;
			
			return $this;
		}
		
		public function getTel(): ?string
		{
			return $this->tel;
		}
		
		public function setTel(string $tel): self
		{
			$this->tel = $tel;
			
			return $this;
		}
		
		public function getContenu(): ?string
		{
			return $this->contenu;
		}
		
		public function setContenu(string $contenu): self
		{
			$this->contenu = $contenu;
			
			return $this;
		}
		
		public function getSexe(): ?string
		{
			return $this->sexe;
		}
		
		public function setSexe(string $sexe): self
		{
			$this->sexe = $sexe;
			
			return $this;
		}
	}
