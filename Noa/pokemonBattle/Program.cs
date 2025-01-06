using System;
using System.Reflection.Metadata.Ecma335;
using System.Runtime.CompilerServices;
using System.Security.Cryptography.X509Certificates;

namespace Pokebattle;

class Program
{

    static void Main(string[] args)
    {
        Arena arena = new Arena();
        while (true)
        {
            List<Trainer> trainersClass = arena.createTrainer();
            arena.startBattle(trainersClass);
            Console.WriteLine("Do you want to play again? (yes/no)");
            string game = Console.ReadLine();
            if (game == "no")
            {
                break;
            }
        }
    }
}
