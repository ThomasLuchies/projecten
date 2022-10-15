package Chess.Core.Pieces;

import Chess.Core.*;
import Chess.Core.StateAnalysers.CheckAnalyser;
import Chess.Core.Usecases.LocateKing.LocateKing;
import Chess.Core.Utilities.SimulateMove;

import java.util.HashSet;

/**
 * Represents a chess piece.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public abstract class Piece
{
    public static class MoveNotPossible extends Exception
    {
        public MoveNotPossible()
        {
            super("That move is not possible!");
        }
    }

    private final Color color;
    private final Board board;
    private int moves;

    public Piece(Color color, Board board)
    {
        this.color = color;
        this.board = board;
        this.moves = 0;
    }

    public Color getColor()
    {
        return color;
    }

    public Board getBoard()
    {
        return board;
    }

    /**
     * Gets the amount of times the piece is moved around the board.
     *
     * @return The move amount.
     */
    public int getMoves()
    {
        return moves;
    }

    /**
     * Sets the amount of times the piece is moved around the board.
     *
     * @param moves The move amount.
     */
    public void setMoves(int moves)
    {
        this.moves = moves;
    }

    /**
     * Contains the logic to move the piece around the board based on the purpose of the piece.
     *
     * @param state The current state of the game.
     * @param location The current location of the chess piece.
     * @param destination The destination of the chess piece.
     * @throws MoveNotPossible When the piece cannot be moved the the specified destination.
     */
    public void move(State state, Coords location, Coords destination) throws MoveNotPossible, Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var moves = availableMoves(state, location);
        if (!moves.contains(destination))
            throw new MoveNotPossible();
        getBoard().setPiece(destination, this);
        getBoard().removePiece(location);
        setMoves(getMoves() + 1);
    }

    /**
     * Determines all available moves based on the logic to move the piece around the board.
     *
     * @param state The current state of the game.
     * @param location The current location of the chess piece.
     * @throws Field.NoPieceAvailable When no piece is available on the specified destination.
     * @throws Board.FieldNotFound When a field is not found.
     * @throws LocateKing.KingNotFound When the king is nog found.
     */
    public abstract HashSet<Coords> availableMoves(State state, Coords location) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound;

    /**
     * Removes all the moves that causes checks.
     *
     * @param state The current state of the game.
     * @param location The current location of the chess piece.
     * @throws Field.NoPieceAvailable When no piece is available on the specified destination.
     * @throws Board.FieldNotFound When a field is not found.
     * @throws LocateKing.KingNotFound When the king is nog found.
     */
    protected void removeMovesThatCausesChecks(State state, Coords location, HashSet<Coords> moves) throws Board.FieldNotFound, Field.NoPieceAvailable, LocateKing.KingNotFound
    {
        var checkAnalyser = new CheckAnalyser();
        var simulateMove = new SimulateMove();
        for (var iterator = moves.iterator(); iterator.hasNext();)
        {
            var simulation = simulateMove.simulate(getBoard(), location, iterator.next());
            if (checkAnalyser.analyse(state, simulation, getColor()).equals(State.check))
                iterator.remove();
        }
    }
}