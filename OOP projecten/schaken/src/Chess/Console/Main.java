package Chess.Console;

import Chess.Core.*;
import Chess.Core.Pieces.Pawn;
import Chess.Core.Pieces.Piece;
import Chess.Core.Pieces.Queen;
import Chess.Core.Usecases.LocateKing.LocateKing;

import java.io.IOException;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.Scanner;

class Main implements PromotionHandler
{
    static Game game;
    static final DrawBoard drawBoard = new DrawBoard();

    static
    {
        try
        {
            game = new Game(new Main());
        }
        catch (Board.FieldNotFound | Field.NoPieceAvailable e)
        {
            System.out.println(e.getMessage());
            System.out.println("Press any key to continue...");
            scan();
        }
        reset();
    }

    public static void main(String[] args)
    {
        HashSet<Coords> availableMoves = new HashSet<>();
        String availableMovesInput = "";
        //noinspection InfiniteLoopStatement
        while (true)
        {
            switch (game.getState())
            {
                case checkmate ->
                {
                    displayBoard(availableMoves);
                    System.out.println("Player " + game.getTurn() + " has been checkmated.");
                    System.out.println("Press any key to reset the game...");
                    scan();
                    reset();
                }
                case stalemate ->
                {
                    displayBoard(new HashSet<>());
                    System.out.println("Player " + game.getTurn() + " has been stalemated.");
                    System.out.println("Press any key to reset the game...");
                    scan();
                    reset();
                }
                case check, active ->
                {
                    displayBoard(availableMoves);
                    System.out.println();
                    if (!availableMoves.isEmpty())
                    {
                        System.out.println("Available moves for " + availableMovesInput);
                        availableMoves = new HashSet<>();
                        availableMovesInput = "";
                    }
                    System.out.println("Player " + game.getTurn() + " to move.");
                    var input = new Scanner(System.in).nextLine();
                    if (!CoordsInput.isValid(input))
                    {
                        System.out.println("The wrong input was given.");
                        System.out.println("Press any key to continue...");
                        scan();
                    }
                    else if (input.length() == 2)
                    {
                        var location = new Coords(CoordsInput.xLocation(input), CoordsInput.yLocation(input));
                        try
                        {
                            cls();
                            var piece = game.getBoard().getPiece(location);
                            if (piece.getColor() == game.getTurn())
                            {
                                availableMoves = piece.availableMoves(game.getState(), location);
                                availableMovesInput = input;
                            }
                            else
                            {
                                System.out.println("It is " + game.getTurn() + "'s turn! >:(");
                                System.out.println("Press any key to continue...");
                                scan();
                            }
                        }
                        catch (Board.FieldNotFound | Field.NoPieceAvailable | LocateKing.KingNotFound e)
                        {
                            System.out.println(e.getMessage());
                            System.out.println("Press any key to continue...");
                            scan();
                        }
                    }
                    else if (input.length() == 4)
                    {
                        var location = new Coords(CoordsInput.xLocation(input), CoordsInput.yLocation(input));
                        var destination = new Coords(CoordsInput.xDestination(input), CoordsInput.yDestination(input));
                        try
                        {
                            cls();
                            var piece = game.getBoard().getPiece(location);
                            if (piece.getColor() == game.getTurn())
                            {
                                game.getBoard().getPiece(location).move(game.getState(), location, destination);
                                game.nextTurn();
                                availableMoves = new HashSet<>();
                                availableMovesInput = "";
                            }
                            else
                            {
                                System.out.println("It is " + game.getTurn() + "'s turn! >:(");
                                System.out.println("Press any key to continue...");
                                scan();
                            }
                        }
                        catch (Board.FieldNotFound | Field.NoPieceAvailable | LocateKing.KingNotFound | Piece.MoveNotPossible e)
                        {
                            System.out.println(e.getMessage());
                            System.out.println("Press any key to continue...");
                            scan();
                        }
                    }
                }
            }
            cls();
        }
    }

    static void displayBoard(HashSet<Coords> availableMoves)
    {
        var board = game.getBoard();
        ArrayList<Piece> takenPiecesAsList = new ArrayList<>(board.getTakenPieces());
        try
        {
            System.out.println(drawBoard.draw(board, availableMoves, takenPiecesAsList));
        }
        catch (Board.FieldNotFound | Field.NoPieceAvailable e)
        {
            System.out.println(e.getMessage());
            System.out.println("Press any key to continue...");
            scan();
        }
    }

    static void reset()
    {
        try
        {
            game.reset();
        }
        catch (Board.FieldNotFound | Field.NoPieceAvailable e)
        {
            System.out.println(e.getMessage());
            System.out.println("Press any key to continue...");
            scan();
        }
    }

    static void cls()
    {
        try
        {
            new ProcessBuilder("cmd", "/c", "cls").inheritIO().start().waitFor();
        }
        catch (InterruptedException | IOException e)
        {
            System.out.println(e.getMessage());
            System.out.println("Press any key to continue...");
            scan();
        }
    }

    static void scan()
    {
        try
        {
            new Scanner(System.in).nextLine();
        }
        catch (Exception exception)
        {
            //ignored
        }
    }

    @Override
    public void handlePromotion(Pawn pawn, Coords destination)
    {
        var board = game.getBoard();
        var queen = new Queen(pawn.getColor(), board);
        try
        {
            board.removePiece(destination);
            board.setPiece(destination, queen);
        }
        catch (Board.FieldNotFound | Field.NoPieceAvailable e)
        {
            System.out.println(e.getMessage());
            System.out.println("Press any key to continue...");
            scan();
        }
    }
}