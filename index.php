<?php

namespace App\Command;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/db/insert.php';
require __DIR__ . '/src/db/list.php';
require __DIR__ . '/src/db/add.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AskNameCommand extends Command
{

    function configure() 
    {
        $this->setName('ask')
            ->setDescription('Interactively asks name from the user')
            ->setHelp('This command asks a user name interactively and prints it');
    }

    function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $output->writeln([            
            '** Hey mate, what would you like to do today? **',
            '',
            ' To continue please inform a number in the options bellow. '       
        ]);

        $output->writeln([ 
            '',
            '===================== OPTIONS-Personal Data ======================',            
            '*  1 - Insert your Name, Email and Phone                          *',
            '*  2 - Add your age                                               *',
            '*  3 - List                                                       *',
            '==================================================================',
            '',        
        ]);            
       
        $question = new Question(" Number...: ", "guest");
        $answer = $helper->ask($input, $output, $question);
        
        if ($answer == '1' ) { //Insert

            $question = new Question("Enter your Name: ", "guest");
            $name = $helper->ask($input, $output, $question);

            $question = new Question("Enter your Email: ", "guest");
            $email = $helper->ask($input, $output, $question);

            $question = new Question("Enter your Phone: ", "guest");
            $phone= $helper->ask($input, $output, $question);
            
            $question = new Question("Would you like to record these information? ( Y/N ): ", "guest");
            $answerData = $helper->ask($input, $output, $question);

            if (strtolower($answerData) == 'y') {
                insertDb($name, $email, $phone);
                echo 'Recorded';
            } else echo 'Not Recorded';

        } elseif ($answer == 2){  //Append-Add

           $question = new Question("Which ID you would like to add the Age: ", "guest");
           $id = $helper->ask($input, $output, $question);

           $question = new Question("Age.: ", "guest");
           $age = $helper->ask($input, $output, $question); 
                  
           addDb($id,$age);

        } elseif ($answer == 3){   //List
    
           $output->writeln([ listDb() ]); 
                          
        } else {   
                  
            echo 'Option not selected.';                
         }
         
        return 0;      

      }        
     
}

$app = new Application();

$app->add(new AskNameCommand()); 

$app->run();


