package Chess.Core.Pieces;

import Chess.Core.*;
import Chess.Core.Usecases.ListAvailableMoves.ListAvailableRookMoves;
import Chess.Core.Usecases.LocateKing.LocateKing;

import java.util.HashSet;

public class Rook extends Piece
{
    public Rook(Color color, Board board)
    {
        super(color, board);
    }

    @Override
    public HashSet<Coords> availableMoves(State state, Coords location) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var listAvailableRookMoves = new ListAvailableRookMoves();
        var moves = listAvailableRookMoves.list(getBoard(), location);
        removeMovesThatCausesChecks(state, location, moves);
        return moves;
    }
}