package Chess.Core.Utilities;

import Chess.Core.*;
import Chess.Core.Pieces.Piece;
import Chess.Core.Usecases.LocateKing.LocateKing;

import java.util.HashMap;
import java.util.HashSet;

public class ListAvailableMovesByColor
{
    public HashSet<Coords> list(State state, Board board, Color color) throws Field.NoPieceAvailable, LocateKing.KingNotFound, Board.FieldNotFound
    {
        var pieces = new HashMap<Piece, Coords>();
        for (var field : board.getFields())
            if (field.pieceOnField())
                if (field.getPiece().getColor().equals(color))
                    pieces.put(field.getPiece(), field.getCoords());

        var availableMoves = new HashSet<Coords>();
        for (var entry : pieces.entrySet())
        {
            var moves = entry.getKey().availableMoves(state, entry.getValue());
            availableMoves.addAll(moves);
        }
        return availableMoves;
    }
}